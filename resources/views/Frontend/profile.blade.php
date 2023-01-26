<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        /* body {
    background: rgb(99, 39, 120)
} */

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.backBtn{
    display: inline-block;
    padding: 12px 30px;
    background-color: #D10024;
    border: none;
    border-radius: 40px;
    color: #FFF;
    text-transform: uppercase;
    font-weight: 700;
    text-align: center;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    text-decoration: none;
}
.backBtn:hover{
    color: #fff
}
    </style>

</head>
<body>
    <div class="p-4">
        <a href="{{ url('/') }}" class="backBtn">GO BACK WEBSITE</a>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="{{ url('updateProfile') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" value="{{ $user->username }}"></div>
                    </div>
                    <div class="row mt-3">
                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                        <div class="col-md-12"><label class="labels">User Name</label><input type="text" class="form-control" placeholder="User Name" value="{{ $user->username }}" name="username"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly></div>
                        <div class="col-md-12"><label class="labels">Role</label><input type="text" class="form-control" placeholder="Role" value="{{ $user->role }}" name="role"></div>
                        <div class="col-md-12"><label class="labels">Contact</label><input type="text" class="form-control" placeholder="Contact" value="{{ $user->contact }}" name="contact"></div>
                        <div class="col-md-12"><label class="labels">Status</label><input type="text" class="form-control" placeholder="Status" value="{{ $user->status }}" name="status"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Address" value="{{ $user->address }}" name="address"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button">Save Profile</button></div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
