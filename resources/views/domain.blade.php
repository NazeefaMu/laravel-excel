<div class="form-group">
    <label for="name">Domain</label>
    <select class="form-control">
        @foreach($domains as $domain)
            <option value="{{$domain['id']}}">{{$domain['domain_name']}}</option>
        @endforeach
    </select>
</div>
