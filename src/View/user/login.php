<?php require __DIR__ . '/../partial/header.php' ?>
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <form class="form-signin" action="/login" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" required>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control mt-2" placeholder="Password" required>
                <div class="checkbox mb-3 mt-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </section>
</main>
<?php require __DIR__ . '/../partial/footer.php' ?>
