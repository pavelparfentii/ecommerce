@php

    $id = Auth::user()->id;
    $user = App\Models\User::find($id);

@endphp

<div class="col-md-2"><br>
    <img class="card-img-top" style="border-radius: 50%"
         src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}"
         height="100%" width="100%"><br><br>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{ route('dashboard') }}"
               class="btn btn-primary btn-sm btn-block">Home</a>
        </li>

        <li class="list-group-item">
            <a href="{{ route('user.profile') }}"
               class="btn btn-primary btn-sm btn-block">Profile Update</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('change.password') }}"
               class="btn btn-primary btn-sm btn-block">Change Password </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('my.orders') }}"
               class="btn btn-primary btn-sm btn-block">My Orders</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('return.order.list') }}"
               class="btn btn-primary btn-sm btn-block">Return Orders</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('cancel.orders') }}"
               class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('user.logout') }}"
               class="btn btn-danger btn-sm btn-block">Logout</a>
        </li>

    </ul>

</div> <!-- // end col md 2 -->
