<div class="card mb-4 mb-xl-0">
    <div class="card-header">Profile Picture</div>
    <div class="card-body text-center">
        <!-- Profile picture image-->
        <img class="img-account-profile rounded-circle mb-2" src="/assets/img/illustrations/profiles/{{ ($image>'') ? $image : 'no-profile.jpg' }}" alt="" />
        <!-- Profile picture help block-->
        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 2 MB</div>
        <!-- Profile picture upload button-->
        <button class="btn btn-primary btn-sm" type="button">Upload new image</button>
    </div>
</div>
