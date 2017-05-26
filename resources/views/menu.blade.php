<nav class="nav has-shadow">
    <div class="nav-left">
        <a class="nav-item">
            <img src="img/mnemosine.png" class="image" alt="Mnemosine logo">
        </a>
    </div>

    <div class="nav-right nav-menu">
        <div class="nav-item">
            <div class="content has-text-centered">
                <span class="dropdown">
                    <span id="user-menu" onclick="showMenu()">
                        <button class="button is-light">{{ Auth::user()->username }}</button>
                    </span>

                    <div id="user-menu-options" class="has-text-left dropdown-content" style="right: 1px;">
                        <div class="box">
                            <button class="button is-light" onclick="showModal()">Mudar minha senha</button>

                            <form action="{{ route('logout') }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="button is-light">Logout</button>
                            </form>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>

    {{-- Aqui está o modal #change-password --}}
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
</script>