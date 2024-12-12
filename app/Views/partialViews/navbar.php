<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div style="width: 300px;">
      <a href='/'><img src="<?= base_url('assets/bookmyshow.png') ?>" alt="Logo" style="height: 40px;"></a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <form class="d-flex" role="search" style="width:70%;">
        <input class="form-control me-2" type="search" placeholder="Search Your Movies..." aria-label="Search">
      </form>

    </div>
    <?php if (session('Roles') === 'admin'): ?>
      <div>

        <a href="/admin/signin"><button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-right-to-bracket mx-1"></i>Sign in</button></a>
        <a href="/admin/register"><button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-right-to-bracket mx-1"></i>Register</button></a>
        <form action="/logout" method="POST" style="display: inline;">
          <button type="submit" class="btn btn-sm btn-success text-white fw-bold">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Log out
          </button>
        </form>
      </div>
    <?php elseif (session('Roles') === 'user'): ?>
      <div>

        <a href="/signin"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-sign-in mx-1" aria-hidden="true"></i>Sign in</button></a>
        <a href="/register"><button type="button" class="btn btn-sm btn-success"><i class="fa-solid fa-user mx-1"></i>Register</button></a>
        <a href="/my/bookings"><button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-eye mx-1"></i>View Bookings</button></a>

        <form action="/logout" method="POST" style="display: inline;">
          <button type="submit" class="btn btn-sm btn-success text-white fw-bold">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Log out
          </button>
        </form>
      </div>
    <?php endif; ?>
  </div>
</nav>