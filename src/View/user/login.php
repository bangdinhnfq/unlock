<?php require __DIR__ . '/../particles/header.php' ?>
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <form class="form-signin" action="/login" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
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
<?php require __DIR__ . '/../particles/footer.php' ?>
