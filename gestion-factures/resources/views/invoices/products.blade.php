<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="{{ asset('resources/css/main.css') }}">

    <!-- Bootstrap CSS -->
    

    <!-- Custom CSS -->
    <style>
         /* Custom pagination styles */
    .pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    .pagination a, .pagination span {
        padding: 2px 2px; /* Adjust padding around the links */
        font-size: 10px; /* Adjust font size */
        border: 1px solid #ddd;
        color: #333;
        text-decoration: none;
    }

    .pagination a:hover {
        background-color: #f1f1f1;
    }

    .pagination .disabled {
        color: #ccc;
    }

    .pagination .active {
        font-weight: bold;
        background-color: #007bff;
        color: white;
    }

    /* Adjust size of the pagination icons */
    .pagination li {
        margin: 0 2px; /* Space between icons */
    }

    .pagination .page-link {
        font-size: 1px; /* Smaller icon size */
        padding: 5px 5px; /* Adjust padding */
    }

    /* Optional: You can target the arrow icons specifically */
    .pagination .page-item .page-link {
        font-size: 4px; /* Adjust arrow size */
    }
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

    <h1>Liste Des Produits:</h1>

  

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>fournisseur</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->name }}</td>
                    <td>{{ $produit->price }}</td>
                    <td>{{ $produit->supplier->name ??'N/A' }} </td>
                

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $produits->links() }}
    </div>
    
</body>
</html>
