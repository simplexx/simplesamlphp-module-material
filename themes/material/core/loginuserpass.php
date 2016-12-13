<!DOCTYPE html>
<html>
<head>
    <title><?= $this->t('{material:login:title}') ?></title>

    <?php include __DIR__ . '/../common-head-elements.php' ?>

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="mdl-layout mdl-layout--fixed-header fill-viewport">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">
                <?= $this->t('{material:login:header}') ?>
            </span>
        </div>
    </header>

    <main class="mdl-layout__content">
        <form method="POST" action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" 
              layout-children="column">
            <input type="hidden" name="AuthState" 
                   value="<?= htmlspecialchars($this->data['stateparams']['AuthState']) ?>" />

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="username" class="mdl-textfield__label">
                    <?= $this->t('{material:login:label_username}') ?>
                </label>
                <input type="text" name="username" tabindex="1" 
                       class="mdl-textfield__input" autofocus 
                       value="<?= $this->data['username'] ?>"/>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="password" class="mdl-textfield__label">
                    <?= $this->t('{material:login:label_password}') ?>
                </label>
                <input type="password" name="password" tabindex="2" 
                       class="mdl-textfield__input" />
            </div>
            
            <?php
            if ($this->data['errorcode'] == 'WRONGUSERPASS') {
            ?>
            <p class="mdl-color-text--red" layout-children="row" 
               child-spacing="space-between">
                <i class="material-icons">error</i>

                <span class="mdl-typography--caption margin">
                    <?= $this->t('{material:login:error_wronguserpass}') ?>
                </span>
            </p>
            <?php
            }
            ?>

            <?php
            $key = getenv("RECAPTCHA_SITE_KEY");
            if ($this->data['errorcode'] == 'RECAPTCHA_REQUIRED' && isset($key)) {
            ?>
            <p class="g-recaptcha" data-sitekey="<?= $key ?>"></p>
            <?php
            }
            ?>

            <button class="mdl-button mdl-button--colored mdl-button--raised">
                <?= $this->t('{material:login:button_login}') ?>
            </button>
        </form>
    </main>

    <?php include __DIR__ . '/../common-footer.php' ?>
</div>
</body>
</html>