<div>
   <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="mb-4">
               <input wire:model.live="search" type="text" placeholder="Search polls..."
                  class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="overflow-x-auto">
               <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                     <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Question</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start
                           Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End
                           Date</th>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Options</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Actions</th>
                     </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                     @foreach($polls as $poll)
                     <tr>
                        @if($editingPollId === $poll->id)
                        <td class="px-6 py-4 whitespace-nowrap" colspan="5">
                           <div class="mb-2 grid grid-cols-1 md:grid-cols-2 gap-2">
                              <flux:field>
                                 <flux:label>Question</flux:label>
                                 <flux:input type="text" wire:model.defer="editData.question" />
                              </flux:field>
                              <flux:field>
                                 <flux:label>Status</flux:label>
                                 <flux:select wire:model.defer="editData.status">
                                    <option value="upcoming">Upcoming</option>
                                    <option value="active">Active</option>
                                    <option value="closed">Closed</option>
                                 </flux:select>
                              </flux:field>
                              <flux:field>
                                 <flux:label>Start Date</flux:label>
                                 <flux:input type="datetime-local" wire:model.defer="editData.start_date" />
                              </flux:field>
                              <flux:field>
                                 <flux:label>End Date</flux:label>
                                 <flux:input type="datetime-local" wire:model.defer="editData.end_date" />
                              </flux:field>
                           </div>
                           <div class="mb-2">
                              <flux:label class="mb-1">Poll Options</flux:label>
                              <div class="space-y-2">
                                 @foreach($editOptions as $idx => $option)
                                 <div class="flex items-center gap-2">
                                    <flux:field class="flex-1">
                                       <flux:input type="text" wire:model.defer="editOptions.{{ $idx }}" placeholder="Option text" />
                                    </flux:field>
                                    @if(count($editOptions) > 2)
                                    <flux:button type="button"
                                                 wire:click="removeOptionField({{ $idx }})"
                                                 variant="danger"
                                                 size="sm">
                                       Remove
                                    </flux:button>
                                    @endif
                                 </div>
                                 @endforeach
                                 <flux:button type="button"
                                              variant="filled"
                                              wire:click="addOptionField"
                                              class="mt-1 border">
                                    Add Option
                                 </flux:button>
                              </div>
                           </div>
                           <div class="mt-2 flex gap-2">
                              <flux:button variant="primary"
                                           wire:click="update">
                                 Save
                              </flux:button>
                              <flux:button variant="danger"
                                           wire:click="cancel">
                                 Cancel
                              </flux:button>
                           </div>
                        </td>
                        @else
                        <td class="px-6 py-4 whitespace-nowrap">{{ $poll->question }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($poll->status) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $poll->start_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $poll->end_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                           <div class="grid grid-cols-1 gap-2">
                              @foreach($poll->options as $option)
                                 <flux:badge color="lime" class=" max-w-max">{{ Str::limit($option->option_text, 10) }}</flux:badge>
                              @endforeach
                           </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                           <flux:button wire:click="edit({{ $poll->id }})" icon="pencil-square" wire:navigate
                              class="mr-2"></flux:button>
                        </td>
                        @endif
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>

            <div class="mt-4">
               {{ $polls->links() }}
            </div>
         </div>
      </div>
   </div>
</div>