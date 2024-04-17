@extends('theme::layouts.customer')

@section('style')
<style>
    .navbar {
        background: #FFF;
        padding: 20px;
        position: left;
        min-height: 0px;
        top: 0;
        left: 0;
        right: 0;
        box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
    }

    .d-flex {
        display: flex;
        flex-grow: 1;
    }

    .navbar {
        background: #FFF;
        padding: 20px;
        position: left;
        min-height: 0px;
        top: 0;
        left: 0%;
        right: 0%;
        box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
    }

    .p24bb {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
        font-weight: 700;
    }

    .container-fluid {
        display: flex;
        flex-direction: column;
    }

    .box {
        margin-bottom: 10px;
        background: #ffffff;
        border-radius: 24px;
        padding: 12px 12px 12px 12px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        height: 104px;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .border-frame {
        display: flex;
        flex-direction: row;
        border: 1.5px solid black;
        border-radius: 30px;
        width: 170px;
        justify-content: center;
        /* Center the content horizontally */
        align-items: center;
        height: 30px;
    }

    #addStudentBtn {
        border-radius: 84px; 
        background: #233656;
        border: 1px solid #233656;
        box-shadow: 0px 4px 4px 0px #23365680;
    }

    #addStudentBtn:hover {
        background: #2e4468;
        border: 1px solid #2e4468;
    }
</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="background-image: linear-gradient(350deg, #AAC9E4 1.08%, #233656 73.2%);padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
    <a href="{{ route('wave.home') }}">
        <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
            <i class="fas fa-chevron-left"></i></button></a>
    <div style="width: 100%;margin-bottom: 30px;">
        <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1" style="margin-bottom: 0px;height: 31px;color: #FFFFFF;"><strong>Student Journeys</strong></p>
    </div>
    <div class="row gx-2 gy-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3">
        @if (!empty($students))
            @foreach ($students as $student)
            <div class="col-sm-4">
                <a class="box" style="width:100%; height:auto; display: flex; align-items: center; color: #000; text-decoration: none;" href="{{ route('wave.student1', $student['id']) }}">
                    <div class="d-flex flex-column justify-content-between" style="padding: 10px; width: 100%; height: 150px;">
                        <div class="d-flex align-items-center">
                            <div class="avatar-circle_container">
                                <img src="{{ $student['image_path'] == '' ? asset('/themes/tailwind/images/chris_chan.png') : $student['image_path'] }}" style="width: 90px; box-shadow: 0px 0px rgba(9,9,10,0.4);">
                            </div>
                            <div class="ml-3">
                                <p class="p22bold mb-0">
                                    <strong>{{ $student['name'] }}</strong>
                                </p>
                                <p class="text-nowrap p18b mb-0" style="opacity: 0.50; margin-bottom: 10px;">
                                    {{ $student['student_information']['level'] ? $student['student_information']['level']['name'] : '-' }}
                                </p>
                                <div class="border-frame">
                                    <p class="p18b m-0 p-2" style="text-align: center; font-size: 14px;">{{ $student['student_information']['hkid'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        @endif
    </div>
    
    <!-- Add New Student Button -->
    <div style="text-align: center; margin-top: 20px;">
        <button class="btn btn-primary" id="addStudentBtn">Add New Student</button>
    </div>
</div>

@endsection

@section('javascript')
<script>
    document.getElementById('addStudentBtn').addEventListener('click', function() {
        // Set the session value when the button is clicked
        fetch('{{ route("wave.addnewstudent") }}', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(response => {
            if (response.ok) {
                // Session value is set successfully
                console.log('Session value set successfully.');
                // Redirect to the student page or perform any other action if needed
                window.location.href = '{{ route("wave.addnewstudent") }}';
            } else {
                // Failed to set session value
                console.error('Failed to set session value.');
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    });
</script>
@endsection
