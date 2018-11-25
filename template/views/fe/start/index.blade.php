<section class="breadcrumb">
    {BREADCRUMB}
</section>

<section class="suche">
    <div class="container mt-5">
        <form action="/suchergebnis" method="post">
            <div class="input-group">
                <input type="text" id="search" name="q" class="form-control" placeholder="{START.WONACH_SUCHST_DU}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
            </div>
        </form>
        <div id="results"></div>
    </div>
</section>