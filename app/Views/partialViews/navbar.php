<nav class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid">
    <div style="width: 700px; display: flex; flex-direction: row; gap: 10px;">
      <a href='/'><img src="<?= base_url('assets/bookmyshow.png') ?>" alt="Logo" style="height: 45px;"></a>
      <form class="d-flex" role="search" style="width: 100%;">
        <input class="form-control me-2 w-100" type="search" placeholder="Search Your Movies..." aria-label="Search"></input>
      </form>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
    <?php if (session('Roles') === 'admin'): ?>
      <div>
        <a href="/admin/signin"><button type="button" class="btn btn-primary"><i class="fas fa-running"></i>Admin Signin</button></a>
        <a href="/admin/track/allusers"><button type="button" class="btn btn-danger"><i class="fas fa-running"></i></button></a>
        <a href="/admin/add/movie"><button type="button" class="btn btn-secondary"><i class="fas fa-plus mx-1"></i></button></a>

        <form action="/logout" method="POST" style="display: inline;">
          <button type="submit" class="btn btn-success text-white fw-bold">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Log out
          </button>
        </form>
      </div>
    <?php elseif (session('Roles') === 'user'): ?>
      <div>
        <a href="/my/bookings"><button type="button" class="btn btn-danger"><i class="fa-solid fa-eye mx-1"></i>View Bookings</button></a>
        <form action="/logout" method="POST" style="display: inline;">
          <button type="submit" class="btn btn-success text-white fw-bold">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Log out
          </button>
        </form>
      </div>
    <?php else : ?>
      <div>
        <a href="/admin/signin"><button type="button" class="btn btn-danger"><i class="fa-solid fa-right-to-bracket mx-1"></i>Admin Sign in</button></a>
        <a href="/admin/register"><button type="button" class="btn btn-success"><i class="fa-solid fa-right-to-bracket mx-1"></i>Admin Register</button></a>
        <a href="/signin"><button type="button" class="btn btn-danger"><i class="fa fa-sign-in mx-1" aria-hidden="true"></i>Sign In</button></a>
        <a href="/register"><button type="button" class="btn btn-success"><i class="fa-solid fa-user mx-1"></i>Register</button></a>
      </div>
    <?php endif; ?>
  </div>
</nav>
