<?= $this->Form->create(); ?>
    <fieldset>
        <!-- <label>Username</label>
        <input type="text" name="username"> -->

        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username">
    </div>

        <!-- <label>Password</label>
        <input type="password" name="password"> -->

        <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>

        <input
            type="hidden" name="_csrfToken" autocomplete="off"
            value="<?= $this->request->getAttribute('csrfToken') ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
    <?= $this->Form->end(); ?>