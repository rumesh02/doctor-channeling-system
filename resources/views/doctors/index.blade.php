<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Doctors</title>
</head>
<body>
    <h1>Available Doctors</h1>

    <div class="container">
        <div class="grid">
            @foreach($doctors as $doctor)
                <div class="doctor-card">
                    <h2>{{ $doctor->name }}</h2>
                    <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                    <p><strong>Available Days:</strong> {{ $doctor->available_days }}</p>
                    <p><strong>Available Time:</strong> {{ $doctor->available_time_start }} - {{ $doctor->available_time_end }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
