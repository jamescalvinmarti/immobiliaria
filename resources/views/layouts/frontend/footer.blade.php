<footer>
    <div class="row justify-content-center" id="footer">
        <div class="col-md-4 social-media">
            <h4>GImmobiliaria</h4>
            <div class="social-media-links">
                <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
            </div>
        </div>
        <div class="col-md-8 footer-links">
            <a href="{{ route('home') }}">Inici</a>
            <a href="{{ route('property-list') }}">{{ __('Propietats') }}</a>
            <a href="{{ route('contact') }}">{{ __('Contacte') }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" id="copyright">
            <p>Copyright &copy; GImmobiliaria</p>
        </div>
    </div>
</footer>