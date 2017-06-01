<div id="change-password" class="modal">
    <form action="@{{ url('/password/reset') }}" method="post">
        <div class="modal-background"></div>

        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Mudança de senha</p>
                <button type="button" class="delete" onclick="closeModal()"></button>
            </header>

            <section class="modal-card-body">
                <div class="container">
                    @if (session('error'))
                        <div id="error" class="notification is-danger" onclick="closeFlash()">
                            <button type="button" class="delete"></button>
                            @{{ session('error') }}
                        </div>
                    @endif

                    @{{ csrf_field() }}

                    <input type="hidden" name="username" value="@{{ Auth::user()->username }}">

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Sua senha atual</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" name="actual_password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Sua nova senha</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" name="new_password">

                                    @if ($errors->has('new_password'))
                                        <p class="help is-danger">
                                            @{{ $errors->first('new_password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Repita sua nova senha</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" name="new_password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <p class="help is-danger">
                                            @{{ $errors->first('password_confirmation') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="modal-card-foot">
                <button type="submit" class="button is-success">Salvar</button>
                <button type="button" class="button" onclick="closeModal()">Cancelar</button>
            </footer>
        </div>
    </form>
</div>

<script>
    function closeFlash() {
        document.getElementById('error').remove();
    }

    function closeModal() {
        let modal = document.getElementById('change-password');
        modal.classList.remove('is-active');
    }

    function showModal() {
        let modal = document.getElementById('change-password');
        modal.classList.add('is-active');
    }

    let flash = document.getElementById('error');
    let helper = document.querySelector('.help');
    if(flash || helper) {
        showModal();
    }
</script>