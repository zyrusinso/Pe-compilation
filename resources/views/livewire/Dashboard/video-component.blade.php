<div>
    @include('content-header', ['headerTitle' => 'Video'])
    
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="d-flex justify-content-end mb-2">
                        <button class="btn btn-dark mr-3" wire:click="createShowModal">Create</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @if(auth()->user()->is_admin == 1) <th>User</th> @endif
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Screenshot</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        @if(auth()->user()->is_admin == 1)<td>{{ $this->user($item->user_id)->lname }}</td> @endif
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td><img src="{{ asset('storage').'/'.$item->screenshot }}" style="width: 100px"></td>
                                        <td class="text-center text-sm">
                                            <button class="btn btn-dark btn-sm" wire:click="updateShowModal({{ $item->id }})">
                                                Update
                                            </button>
                                            <button class="btn btn-danger text-white btn-sm" wire:click="deleteShowModal({{ $item->id }})">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="10">No Results Found</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="d-flex justify-content-center">
        {{ $data->links('vendor.livewire.bootstrap') }}
        </div>

        <!-- Create & Update Modal -->
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Video') }}
            </x-slot>

            <x-slot name="content">
                <div class="mb-3">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" type="text" class="{{ $errors->has('title') ? 'is-invalid' : '' }}"
                                 wire:model="title" autofocus />
                    <x-jet-input-error for="title" />
                </div>
                <div class="mb-3">
                    <x-jet-label for="embed_url" value="{{ __('Embeded URL') }}" />
                    <x-jet-input id="embed_url" type="text" class="{{ $errors->has('embed_url') ? 'is-invalid' : '' }}"
                                 wire:model="embed_url" autofocus />
                    <x-jet-input-error for="embed_url" />
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label>Category</label>
                        <select wire:model="category" class="form-control">
                            <option>-- Select a Category --</option>
                            <option value="prelim">Preliminary</option>
                            <option value="mid">Mid Term</option>
                            <option value="final">Final Period</option>
                        </select>
                        @error('selectedCategory') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label for="screeshot">Screenshot <span style="font-size: 10px">(Wait for image to popup before you submit)</span></label><br>
                        @if ($screenshot)
                            <img src="{{ $screenshot}}" width="200">
                        @endif
                        <input type="file" id="imageUpload" wire:change="$emit('fileChoosen')">
                        @error('screenshot') <span class="error" style="color: red"">{{ $message }}</span> @enderror
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                @if ($modelId)
                    <x-jet-button class="ms-2" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update') }}
                    </x-jet-button>
                @else
                    <x-jet-button class="ms-2" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Save') }}
                    </x-jet-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete Title') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this transanction? Once the transaction is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')"
                                        wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="delete" wire:loading.attr="disabled">
                    <div wire:loading wire:target="delete" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

    @push('scripts')
        <script>
            Livewire.on('fileChoosen', () => {
                let inputField = document.getElementById('imageUpload')
                let file = inputField.files[0]
                let reader = new FileReader();
                reader.onloadend = () => {
                    window.livewire.emit('fileUpload', reader.result)
                }
                reader.readAsDataURL(file);
            })
        </script>
    @endpush
</div>


