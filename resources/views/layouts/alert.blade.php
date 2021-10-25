<div class="alert {{session('alert')}} alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        {{ session('data') }}
    </div>
</div>