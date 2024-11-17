<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{ config('l5-swagger.documentations.'.$documentation.'.api.title') }}</title>
  <link rel="stylesheet" type="text/css" href="{{ l5_swagger_asset($documentation, 'swagger-ui.css') }}">
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset($documentation, 'favicon-32x32.png') }}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset($documentation, 'favicon-16x16.png') }}" sizes="16x16" />
  <style>
    html {
      box-sizing: border-box;
      overflow: -moz-scrollbars-vertical;
      overflow-y: scroll;
    }

    *,
    *:before,
    *:after {
      box-sizing: inherit;
    }

    body {
      margin: 0;
      background: #fafafa;
      transition: background 0.3s, color 0.3s;
    }

    .theme-toggle-btn {
      position: absolute;
      top: 70px;
      /* Ajuste a altura conforme o tamanho da sua topbar */
      right: 20px;
      width: 50px;
      height: 50px;
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s, color 0.3s;
    }

    body#dark-mode {
      background: #1b1b1b;
      color: #e7e7e7;
    }

    body#dark-mode .theme-toggle-btn {
      background-color: #fff;
      color: #333;
    }
  </style>
</head>

<body @if(config('l5-swagger.defaults.ui.display.dark_mode')) id="dark-mode" @endif>
  <!-- Botão de mudança de tema -->
  <button class="theme-toggle-btn" id="theme-toggle-btn" title="Switch theme">
    🌙
  </button>

  <div id="swagger-ui"></div>

  <script src="{{ l5_swagger_asset($documentation, 'swagger-ui-bundle.js') }}"></script>
  <script src="{{ l5_swagger_asset($documentation, 'swagger-ui-standalone-preset.js') }}"></script>
  <script>
    window.onload = function () {
            // Build a system
            const ui = SwaggerUIBundle({
                dom_id: '#swagger-ui',
                url: "{!! $urlToDocs !!}",
                operationsSorter: {!! isset($operationsSorter) ? '"' . $operationsSorter . '"' : 'null' !!},
                configUrl: {!! isset($configUrl) ? '"' . $configUrl . '"' : 'null' !!},
                validatorUrl: {!! isset($validatorUrl) ? '"' . $validatorUrl . '"' : 'null' !!},
                oauth2RedirectUrl: "{{ route('l5-swagger.'.$documentation.'.oauth2_callback', [], $useAbsolutePath) }}",

                requestInterceptor: function (request) {
                    request.headers['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
                    return request;
                },

                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],

                plugins: [
                    SwaggerUIBundle.plugins.DownloadUrl
                ],

                layout: "StandaloneLayout",
                docExpansion: "{!! config('l5-swagger.defaults.ui.display.doc_expansion', 'none') !!}",
                deepLinking: true,
                filter: {!! config('l5-swagger.defaults.ui.display.filter') ? 'true' : 'false' !!},
                persistAuthorization: "{!! config('l5-swagger.defaults.ui.authorization.persist_authorization') ? 'true' : 'false' !!}",
            });

            // Alternar tema
            const toggleButton = document.getElementById('theme-toggle-btn');
            toggleButton.addEventListener('click', function () {
                const body = document.body;
                const isDarkMode = body.id === 'dark-mode';
                if (isDarkMode) {
                    body.id = ''; // Remove dark mode
                    toggleButton.textContent = '🌙'; // Define ícone de lua
                } else {
                    body.id = 'dark-mode'; // Add dark mode
                    toggleButton.textContent = '☀️'; // Define ícone de sol
                }
            });

            window.ui = ui;

            @if(in_array('oauth2', array_column(config('l5-swagger.defaults.securityDefinitions.securitySchemes'), 'type')))
            ui.initOAuth({
                usePkceWithAuthorizationCodeGrant: "{!! (bool)config('l5-swagger.defaults.ui.authorization.oauth2.use_pkce_with_authorization_code_grant') !!}"
            });
            @endif
        }
  </script>
</body>

</html>