<x-admin-layout title="IGST Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $igst ? 'Edit' : 'Add' }} IGST">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('igst.index') }}" value="IGST List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $igst ? 'Edit' : 'Add' }} IGST" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:igst.igst-create-edit :igst="$igst"/>
</x-admin-layout>