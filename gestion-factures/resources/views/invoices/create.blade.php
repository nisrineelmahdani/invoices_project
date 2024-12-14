<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Invoice</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0v8Fq5K61V7GBL2l24Hxn2R6p4Rm5DTfl0YYZqLZbwB6S/YI" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #343a40;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            margin-top: 50px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input, .form-group select {
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
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

    <h1>Create an Invoice</h1>
    
    <div class="form-container">
        <form action="{{ route('invoices.store') }}" method="POST"   enctype="multipart/form-data" >
            @csrf
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <div class="form-group">
                <label for="client_name">Client Name:</label>
                <input type="text" id="client_name" name="client_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="invoice_date">Invoice Date:</label>
                <input type="date" id="invoice_date" name="invoice_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control">
                    <option value="unpaid">Unpaid</option>
                    <option value="paid">Paid</option>
                    <option value="canceled">Canceled</option>
                </select>
                <label>Justificatif</label>
                <input type="file" name="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

  

</body>
</html>
