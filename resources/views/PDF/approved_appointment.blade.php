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
          <th>Name</th>
          <th>Email</th>
          <th>Contact Number</th>
          <th>Product Name</th>
          <th>Date & Time</th>
          <th>Details</th>
        </tr>

    @foreach($usersApprovedAppointment as $key => $row)
        <tr>
          <th scope="row">{{ ++$key }}</th>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->phn}}</td>  
            <td>{{$row->product}}</td>  
            <td>{{$row->date_time}}</td>
            <td>{{$row->desc}}</td>
        </tr>
    @endforeach
      </table>
      <br>
</body>
</html>