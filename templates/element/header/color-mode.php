<!--begin::Color Mode Toggle-->
<li class="nav-item dropdown">
    <a
        class="nav-link"
        href="#"
        id="bd-theme"
        aria-label="Toggle color scheme"
        data-bs-toggle="dropdown"
        aria-expanded="false"
    >
        <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
        <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
        <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
    </a>
    <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="bd-theme"
        style="--bs-dropdown-min-width: 8rem"
    >
        <li>
            <button
                type="button"
                class="dropdown-item d-flex align-items-center"
                data-bs-theme-value="light"
                aria-pressed="false"
            >
                <i class="bi bi-sun-fill me-2"></i>
                Light
                <i class="bi bi-check-lg ms-auto d-none"></i>
            </button>
        </li>
        <li>
            <button
                type="button"
                class="dropdown-item d-flex align-items-center"
                data-bs-theme-value="dark"
                aria-pressed="false"
            >
                <i class="bi bi-moon-fill me-2"></i>
                Dark
                <i class="bi bi-check-lg ms-auto d-none"></i>
            </button>
        </li>
        <li>
            <button
                type="button"
                class="dropdown-item d-flex align-items-center active"
                data-bs-theme-value="auto"
                aria-pressed="true"
            >
                <i class="bi bi-circle-half me-2"></i>
                Auto
                <i class="bi bi-check-lg ms-auto d-none"></i>
            </button>
        </li>
    </ul>
</li>
<!--end::Color Mode Toggle-->