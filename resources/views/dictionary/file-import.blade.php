<x-guest-layout>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>