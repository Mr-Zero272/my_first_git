<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="register-form">
                    <?php if($isPost && isset($errors['failed'])) : ?>
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $errors['failed']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form class="row g-3 needs-validation" action="<?= $_SERVER['PHP_SELF'] ?>" method='POST'
                        id="form_register" novalidate>
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="username" name="username" value="<?= $params['username'] ?? null ?>"
                                class="form-control <?= isset($errors['username']) ? ' is-invalid' : ' is-valid' ?>"
                                id="username" placeholder="Your username">
                            <label for="username">Username</label>
                            <div class="invalid-feedback">
                                <?= $errors['username'] ?? null; ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" value="<?= $params['email'] ?? null ?>"
                                class="form-control <?= isset($errors['email']) ? ' is-invalid' : ' is-valid' ?>" id="email"
                                placeholder="name@example.com">
                            <label for="email">Email address</label>
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?? null; ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" value="<?= $params['password'] ?? null ?>"
                                class="form-control <?= isset($errors['password']) ? ' is-invalid' : ' is-valid' ?>"
                                id="password" placeholder="Password">
                            <label for="password">Password</label>
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?? null; ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="confirm_password"
                                value="<?= $params['confirm_password'] ?? null ?>"
                                class="form-control <?= isset($errors['confirm_password']) ? ' is-invalid' : ' is-valid' ?>"
                                id="confirm_password" placeholder="Password">
                            <label for="password">Password</label>
                            <div class="invalid-feedback">
                                <?= $errors['confirm_password'] ?? null; ?>
                            </div>
                        </div>

                        <div class="form-floating">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="term" required>
                                <label class="form-check-label" for="term">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <button class="btn" type="submit">Register</button>
                        </div>
                        <p class="outer-link">
                            Already have an account?
                            <a href="login.php">Login Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>