<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading"><?php if (!$logged_in): echo 'Login to Account'; else: echo 'My Profile'; endif; ?></div>
                <div class="panel-body">
                    <?php print render($page['content']); ?>
                    <?php if (!$logged_in): ?>
                        <p><span class="text-muted"><em>Forgot your password? <a href="/user/password">Reset password</a>.</em></span></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
