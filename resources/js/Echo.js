import Vue from 'vue'

window.Echo.channel('laravel_database_post-channel')
    .listen('PostCreated', (e) => {
        console.log(e)
        console.log(e.post)

        Vue.$vToastify.success(`Titulo do post ${e.post.title}`, 'Novo Post')
    })