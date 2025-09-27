<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Agendamentos | CRM Salão</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- jQuery + DataTables -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"/>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</head>
<body class="bg-gray-100">

<div class="container mt-5">
  <h2 class="mb-4 text-purple-700">Lista de Agendamentos</h2>

  <table id="tabelaAgendamentos" class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Serviço</th>
        <th>Funcionário</th>
        <th>Data/Hora</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dados as $agendamento): ?>
        <tr>
          <td><?= $agendamento->id_agendamento ?></td>
          <td><?= $agendamento->cliente ?></td>
          <td><?= $agendamento->servico ?></td>
          <td><?= $agendamento->funcionario ?></td>
          <td><?= date('d/m/Y H:i', strtotime($agendamento->data_hora)) ?></td>
          <td><?= ucfirst($agendamento->status) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script>
$(document).ready(function () {
  $('#tabelaAgendamentos').DataTable({
    language: {
      url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json'
    },
    pageLength: 5,
    lengthMenu: [5, 10, 20, 50]
  });
});
</script>

</body>
</html>
