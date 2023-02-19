<div>
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal"  class="overflow-y-auto h-screen">
            <x-slot name="title">Edit Rule</x-slot>
            <x-slot name="content">
                <x-input.group for="filter_field" label="Field to Filter on" paddingless="true"
                               :error="$errors->first('editingRule.filter_field')">
                    <x-input.text wire:model="editingRule.filter_field" id="filter_field"/>
                </x-input.group>
                <x-input.group for="filter_value" label="Filter value (with comparison operator)" paddingless="true"
                               :error="$errors->first('editingRule.filter_value')">
                    <x-input.text wire:model="editingRule.filter_value" id="filter_value"/>
                </x-input.group>
                <x-input.group for="posted_date" label="Use Posted Date for timing" paddingless="true"
                               :error="$errors->first('editingRule.posted_date_is_used')">
                    <x-input.radio-yes-no wire:model="editingRule.posted_date_is_used"/>
                </x-input.group>
                <x-input.group for="is_warranty" label="Warranty order" paddingless="true"
                               :error="$errors->first('editingRule.is_warranty')">
                    <x-input.radio-yes-no id="is_warranty"
                                          wire:model="editingRule.is_warranty"/>
                </x-input.group>
                <x-input.group for="request_location_id" label="Request Location ID" paddingless="true"
                               :error="$errors->first('editingRule.request_location_id')">
                    <x-input.text wire:model="editingRule.request_location_id" id="request_location_id"/>
                </x-input.group>
                <x-input.group for="shipping_location_id" label="Shipping Location ID" paddingless="true"
                               :error="$errors->first('editingRule.shipping_location_id')">
                    <x-input.text wire:model="editingRule.shipping_location_id" id="shipping_location_id"/>
                </x-input.group>
                <x-input.group for="order_type" label="Order Type" paddingless="true"
                               :error="$errors->first('editingRule.order_type')">
                    <x-input.text wire:model="editingRule.order_type" id="order_type"/>
                </x-input.group>
                <x-input.group for="order_for_template" label="Order Flow Template" paddingless="true"
                               help-text="Available fields are $pms_loc, $pms_patient_code, $pms_patient_name, $pms_job, $pms_lab,
                               $pms_supplier, $pms_pos_sku, $pms_user, $pms_id, $pms_date, $pms_vw_ordernum and must be enclosed in double curly braces {"
                               :error="$errors->first('editingRule.order_for_template')">
                    <x-input.textarea wire:model="editingRule.order_for_template" id="order_for_template"/>
                </x-input.group>
                <x-input.group for="workflow_id" label="Worflow ID" paddingless="true"
                               :error="$errors->first('editingRule.workflow_id')">
                    <x-input.text wire:model="editingRule.workflow_id" id="workflow_id"/>
                </x-input.group>
            </x-slot>
            <x-slot name="footer">
                <div class="float-left">
                    <x-button.secondary wire:click="delete">
                        Delete
                    </x-button.secondary>
                </div>
                <div>
                    <x-button.secondary wire:click="$set('showEditModal',false)">
                        Cancel
                    </x-button.secondary>
                    <x-button.primary>
                        Save
                    </x-button.primary>
                </div>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>
