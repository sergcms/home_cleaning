<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 p-0">
                <a href="{{ url()->current() == route('extra') ? '' : route('personal-info') }}" 
                    class="btn btn-light btn-outline-dark btn-lg btn-block text-uppercase {{ url()->current() == route('personal-info') ? 'active' : ''}}">
                    Personal info
                </a>
            </div>
            <div class="col-md-3 p-0">
                <a href="{{ url()->current() == route('extra') ? '' : route('your-home') }}" 
                    class="btn btn-light btn-outline-dark btn-lg btn-block text-uppercase {{ url()->current() == route('your-home') ? 'active' : ''}}">
                    Your home
                </a>
            </div>
            <div class="col-md-3 p-0">
                <a href="{{ url()->current() == route('extra') ? '' : route('materials') }}" 
                    class="btn btn-light btn-outline-dark btn-lg btn-block text-uppercase {{ url()->current() == route('materials') ? 'active' : ''}}">
                    materials
                </a>
            </div>
            <div class="col-md-3 p-0">
                <a href="{{ route('extra') }}" 
                    class="btn btn-light btn-outline-dark btn-lg btn-block text-uppercase {{ url()->current() == route('extra') ? 'active' : ''}}">
                    extras
                </a>
            </div>
        </div>
    </div>
</header>