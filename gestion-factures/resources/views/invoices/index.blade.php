<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq5K61V7GBL2l24Hxn2R6p4Rm5DTfl0YYZqLZbwB6S/YI" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #343a40;
            text-align: center;
            margin-top: 40px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .table {
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            border-radius: 8px;
            background-color: #fff;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
            border: 1px solid #dee2e6;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #e9ecef;
        }

        .table td a {
            margin: 5px;
        }

        .table td form {
            display: inline-block;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding: 10px;
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>

    <h1>Liste Des Factures:</h1>

    <div class="container text-center">
        <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Créer une nouvelle facture</a>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th>file_path</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->client_name }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>
  <a href="{{ route('invoices.view', $invoice->id) }}" target="_blank" class="btn btn-sm btn-info">
    View Document
  </a>
</td>



                    
                        <td> <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</body>
</html>
