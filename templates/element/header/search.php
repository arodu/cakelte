<!--begin::Navbar Search-->
<form class="navbar-search d-none d-md-block ms-3" role="search" action="<?= $searchAction ?? '#' ?>">
    <label for="navbar-search-input" class="visually-hidden">Search</label>
    <div class="navbar-search-field">
        <input
            type="search"
            id="navbar-search-input"
            name="q"
            class="form-control"
            placeholder="Search…"
            autocomplete="off"
        />
        <button class="navbar-search-submit" type="submit" aria-label="Submit search">
            <i class="bi bi-search" aria-hidden="true"></i>
        </button>
    </div>
</form>
<!--end::Navbar Search-->