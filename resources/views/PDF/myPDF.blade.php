<!DOCTYPE html>
<html>
<head>
    <title>Uni-Electronic</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
</head>
<body>
    <h1>{{ $LoggedUserInfo['name'] }}</h1>
    <p>{{ $date }}</p>
    <br>
    <table>
        <tr>
          <th>Serial Number</th>
          <th>Company Name</th>
          <th>Employee Name</th>
          <th>Email</th>
          <th>Date & Time</th>
        </tr>

    @foreach($companyUsers as $key => $row)
        <tr>
          <th scope="row">{{ ++$key }}</th>
            <td>{{$row->name}}</td>
            <td>{{$row->company_name}}</td>
            <td>{{$row->company_email}}</td>  
            <td>{{$row->created_at}}</td>
        </tr>
    @endforeach
      </table>
      <br>
</body>
</html>