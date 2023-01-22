<div>
    <h2>Information</h2>
    <p>Invoice to: {{ $invoice->user->name }}</p>

    <table class="table-auto w-full">
        <tr>
            <th class="lms-cell-border text-left">Name</th>
            <th class="lms-cell-border">Price</th>
            <th class="lms-cell-border">Quantity</th>
            <th class="lms-cell-border text-right">Total</th>
        </tr>

        @foreach ($invoice->items as $item)
            <tr>
                <td class="lms-cell-border">{{ $item->name }}</td>
                <td class="lms-cell-border text-center">${{ number_format($item->price, 2) }}</td>
                <td class="lms-cell-border text-center">{{ $item->quantity }}</td>
                <td class="lms-cell-border text-right">${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
        @endforeach
    </table>

    @if ($enableAddItem)
    <form wire:submit.prevent="saveNewItem">
        <div class="flex mb-4">
            <div class="w-full">
                @include('components.form-field', [
                    'name' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                    'placeholder' => 'Item name',
                    'required' => 'required',
                ])
            </div>
            <div class="min-w-max ml-4">
                @include('components.form-field', [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'placeholder' => 'Type price',
                    'required' => 'required',
                ])
            </div>

            <div class="min-w-max ml-4">
                @include('components.form-field', [
                    'name' => 'quantity',
                    'label' => 'Quantity',
                    'type' => 'number',
                    'placeholder' => 'Type quantity',
                    'required' => 'required',
                ])
            </div>
        </div>
        <div class="flex">
            @include('components.wire-loading-btn')
            <button wire:click="addNewItem" type="button"  class="lms-btn ml-4">Cancel</button>
        </div>
    </form>
    @else
        <button wire:click="addNewItem" class="lms-btn">Add</button>
    @endif
</div>
