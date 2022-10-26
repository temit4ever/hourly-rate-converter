<div id="views">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="firstname"
                   placeholder="First name and Last name">
        </div>
        <div class="mb-3">
            <label for="company-name" class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" id="firstname"
                   placeholder="Company name">
        </div>
        <div class="mb-3">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" name="occupation" class="form-control" id="occupation"
                   placeholder="Occupation">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email"
                   placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input type="text" name="rate" class="form-control" id="rate" placeholder="Hourly Rate">
        </div>
        <div class="mb-3">
            <select name="currency" class="form-select" aria-label="Default select">
                <option selected>Select relevant currency</option>
                @foreach($currencyTypes as $currency_symbol)
                    <option value="{{ $currency_symbol }}">{{ $currency_symbol }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Create User"/>
    </form>
</div>
