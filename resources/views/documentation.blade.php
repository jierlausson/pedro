<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>API Documentation</title>
  <style>
    :root {
      --bg-light: #ffffff;
      --text-light: #333333;
      --bg-dark: #1e1e2f;
      --text-dark: #f5f5f5;
      --divider-light: #cccccc;
      --divider-dark: #555555;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.6;
      background-color: var(--bg-light);
      color: var(--text-light);
      transition: all 0.3s ease-in-out;
    }

    body.dark-mode {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }

    header {
      padding: 1rem;
      background-color: #007bff;
      color: white;
      text-align: center;
    }

    h1,
    h2 {
      margin: 0 0 1rem 0;
    }

    .content {
      padding: 2rem;
    }

    .endpoint {
      margin-bottom: 2rem;
    }

    .divider {
      border-top: 2px solid var(--divider-light);
      margin: 2rem 0;
      transition: border-color 0.3s ease-in-out;
    }

    body.dark-mode .divider {
      border-color: var(--divider-dark);
    }

    pre {
      background: var(--bg-light);
      padding: 1rem;
      border-radius: 5px;
      overflow-x: auto;
      transition: background 0.3s ease-in-out;
    }

    body.dark-mode pre {
      background: var(--bg-dark);
    }

    .toggle-btn {
      position: fixed;
      top: 10px;
      right: 10px;
      background: #007bff;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s ease-in-out;
    }

    .toggle-btn:hover {
      background: #0056b3;
    }
  </style>
</head>

<body>
  <header>
    <h1>Documentação da API</h1>
    <p>Descrição completa dos endpoints disponíveis, com exemplos de request e response.</p>
  </header>

  <button class="toggle-btn" onclick="toggleDarkMode()">Modo Claro/Escuro</button>

  <div class="content">
    <!-- Root Endpoint -->
    <section class="endpoint">
      <h2>Root Endpoint</h2>
      <p>Retorna uma mensagem indicando que a API está funcionando.</p>
      <pre><code>GET    /</code></pre>
      <h4>Exemplo de Response:</h4>
      <pre><code>{
    "message": "Documentação da API"
}</code></pre>
    </section>
    <div class="divider"></div>

    <!-- Health Check -->
    <section class="endpoint">
      <h2>Health Check</h2>
      <p>Endpoint para verificar se a API está online.</p>
      <pre><code>GET    /up</code></pre>
      <h4>Exemplo de Response:</h4>
      <pre><code>{
    "message": "API route is working"
}</code></pre>
    </section>
    <div class="divider"></div>

    <!-- Activities -->
    <section class="endpoint">
      <h2>Activities</h2>
      <p>Gerencia atividades na aplicação.</p>
      <h4>Endpoints:</h4>
      <pre><code>GET    /api/activities</code></pre>
      <pre><code>POST   /api/activities</code></pre>
      <pre><code>PUT    /api/activities/{id}</code></pre>
      <pre><code>DELETE /api/activities/{id}</code></pre>

      <h4>Exemplo de Request (POST):</h4>
      <pre><code>{
    "description": "Nova atividade",
    "workload_max": 40
}</code></pre>

      <h4>Exemplo de Response (200):</h4>
      <pre><code>{
    "id": 1,
    "description": "Nova atividade",
    "workload_max": 40,
    "created_at": "2024-11-15T12:00:00Z",
    "updated_at": "2024-11-15T12:00:00Z"
}</code></pre>
    </section>
    <div class="divider"></div>

    <!-- Class Rooms -->
    <section class="endpoint">
      <h2>Class Rooms</h2>
      <p>Gerencia salas de aula.</p>
      <h4>Endpoints:</h4>
      <pre><code>GET    /api/class-rooms</code></pre>
      <pre><code>POST   /api/class-rooms</code></pre>
      <pre><code>PUT    /api/class-rooms/{id}</code></pre>
      <pre><code>DELETE /api/class-rooms/{id}</code></pre>

      <h4>Exemplo de Request (POST):</h4>
      <pre><code>{
    "description": "Sala de aula A",
    "weight": 2,
    "max": 30,
    "class": "1A",
    "class_time": 60,
    "day_month_year": "2024-11-15"
}</code></pre>

      <h4>Exemplo de Response (200):</h4>
      <pre><code>{
    "id": 1,
    "description": "Sala de aula A",
    "weight": 2,
    "max": 30,
    "class": "1A",
    "class_time": 60,
    "day_month_year": "2024-11-15",
    "created_at": "2024-11-15T12:00:00Z",
    "updated_at": "2024-11-15T12:00:00Z"
}</code></pre>
    </section>
    <div class="divider"></div>

    <!-- Sub Activities -->
    <section class="endpoint">
      <h2>Sub Activities</h2>
      <p>Gerencia subatividades relacionadas a atividades.</p>
      <h4>Endpoints:</h4>
      <pre><code>GET    /api/sub-activities</code></pre>
      <pre><code>POST   /api/sub-activities</code></pre>
      <pre><code>PUT    /api/sub-activities/{id}</code></pre>
      <pre><code>DELETE /api/sub-activities/{id}</code></pre>

      <h4>Exemplo de Request (POST):</h4>
      <pre><code>{
    "activity_id": 1,
    "description": "Subatividade de exemplo",
    "workload_max": 10,
    "workload": 5
}</code></pre>

      <h4>Exemplo de Response (200):</h4>
      <pre><code>{
    "id": 1,
    "activity_id": 1,
    "description": "Subatividade de exemplo",
    "workload_max": 10,
    "workload": 5,
    "created_at": "2024-11-15T12:00:00Z",
    "updated_at": "2024-11-15T12:00:00Z"
}</code></pre>
    </section>
    <div class="divider"></div>

    <!-- Units -->
    <section class="endpoint">
      <h2>Units</h2>
      <p>Gerencia unidades cadastradas.</p>
      <h4>Endpoints:</h4>
      <pre><code>GET    /api/units</code></pre>
      <pre><code>POST   /api/units</code></pre>
      <pre><code>PUT    /api/units/{id}</code></pre>
      <pre><code>DELETE /api/units/{id}</code></pre>

      <h4>Exemplo de Request (POST):</h4>
      <pre><code>{
    "name": "Unidade X",
    "location": "Localização Y"
}</code></pre>

      <h4>Exemplo de Response (200):</h4>
      <pre><code>{
    "id": 1,
    "name": "Unidade X",
    "location": "Localização Y",
    "created_at": "2024-11-15T12:00:00Z",
    "updated_at": "2024-11-15T12:00:00Z"
}</code></pre>
    </section>
    <div class="divider"></div>
  </div>

  <script>
    function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
  </script>
</body>

</html>