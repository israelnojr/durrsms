
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger flash flash-error">
            <button type="button" class="close close position" onclick="this.parentElement.style.display='none'">×</button>
            <span>
            <b> Danger - </b> {{ $error }}</span>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success flash flash-success">
        <button type="button" class="close  position" onclick="this.parentElement.style.display='none'">×</button>
        <span><b> Success - </b> {{ session('success') }}</span>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning flash flash-warning">
        <button type="button" class="close  position" onclick="this.parentElement.style.display='none'">×</button>
        <span><b> Warning - </b> {{ session('warning') }}</span>
    </div>
@endif

<style>
    .flash-success{
    position: fixed;
    top: 43px;
    right: 5px;
    z-index: 1;
}

.position{
    position: relative;
    top: -3px !important;
    right: -9px !important;
    color: inherit;
    font-size: 30px !important;
    z-index: 997;
}

.flash-warning{
    position: fixed;
    top: 43px;
    right: 5px;
    z-index: 1;
}
</style>

<script>
    $(".alert.flash").fadeTo(2000,500).slideUp(500, function(){
        $("alert.flash").slideUp(500);
    });
</script>