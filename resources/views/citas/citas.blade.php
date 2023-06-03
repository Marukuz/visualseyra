<!DOCTYPE html>
<html>
<head>
  <title>Detalles de la Cita</title>
  <!-- Agrega la referencia a Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }

    .card {
      max-width: 400px;
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    .card-header {
      padding: 15px 20px;
      background-color: #f8f9fa;
      border-bottom: none;
    }

    .card-title {
      font-size: 24px;
      margin-bottom: 0;
      color: #007bff;
      text-align: center;
    }

    .card-body {
      padding: 20px;
    }

    .card-text-label {
      font-weight: bold;
      color: #555555;
    }

    .card-text-value {
      margin-top: 5px;
      color: #888888;
    }

    .btn {
      padding: 8px 20px;
      margin-top: 20px;
      background-color: #007bff;
      color: #ffffff;
      border-radius: 5px;
      border: none;
      width: 100%;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Detalles de la Cita</h2>
    </div>
    <div class="card-body">
      <p class="card-text-label">Fecha:</p>
      <p class="card-text-value">3 de junio de 2023</p>
      <p class="card-text-label">Hora:</p>
      <p class="card-text-value">10:00 AM</p>
      <p class="card-text-label">Lugar:</p>
      <p class="card-text-value">Clínica XYZ</p>
      <p class="card-text-label">Médico:</p>
      <p class="card-text-value">Dr. Juan Pérez</p>
      <p class="card-text-label">Motivo:</p>
      <p class="card-text-value">Consulta de seguimiento</p>
      <button class="btn">Confirmar Cita</button>
    </div>
  </div>

  <!-- Agrega la referencia a los scripts de Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
