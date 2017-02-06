<div class="message no-space" v-for="login in logins.getLogins()">
    <article class="media container">
        <figure class="media-left">
            <i class="fa fa-wifi fa-2x"></i>
        </figure>

        <div class="media-content">
            <p class="is-bold" v-text="login.name"></p>
            <p v-text="login.username"></p>
        </div>

        <div class="media-right">
        </div>
    </article>
</div>