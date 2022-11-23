<x-admin-layout title="SGST Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $sgst ? 'Edit' : 'Add' }} SGST">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('sgst.index') }}" value="SGST List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $sgst ? 'Edit' : 'Add' }} SGST" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:sgst.sgst-create-edit :sgst="$sgst"/>
</x-admin-layout>