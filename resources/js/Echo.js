window.Echo.channel('laravel_database_post-channel')
    .listen('PostCreated', (e) => {
        console.log(e)
        console.log(e.post)
    })