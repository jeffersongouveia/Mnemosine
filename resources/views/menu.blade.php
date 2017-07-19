<nav class="nav has-shadow">
    <div class="nav-left">
        <a class="nav-item">
            <img src="favicon.ico" class="image" alt="Logo da Rede Completa">
        </a>
    </div>

    <div class="nav-right nav-menu">
        <div class="nav-item">
            <div class="content has-text-centered">
                <span class="dropdown">
                    <span id="user-menu" onclick="showMenu()">
                        <input id="user-group" type="hidden" value="@{{ $group }}">
                        <button class="button is-light">@{{ Auth::user()->username }}</button>
                    </span>

                    <div id="user-menu-options" class="has-text-left dropdown-content" style="right: 1px; width: 300%;">
                        <div class="box">
                            <a onclick="showModal()">Mudar minha senha</a>

                            <form id="form" action="@{{ route('logout') }}" method="post">
                                @{{ csrf_field() }}
                                <a onclick="submit()">Logout</a>
                            </form>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>

    @{{--Aqui está o modal #change-password --}}
    @include('auth.passwords.reset')
</nav>

<script>
    function showMenu() {
        const options = document.getElementById('user-menu-options');

        if(options.classList.contains('show'))
            options.classList.remove('show');
        else
            options.classList.add('show');
    }

    function showModal() {
        const modal = document.getElementById('change-password');
        modal.classList.add('is-active');
    }

    function submit() {
        let form = document.getElementById('form');
        form.submit();
    }
</script>