<x-admin-layout title="SGST Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="SGST List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('sgst.index') }}" value="SGST List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('sgst.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New SGST
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:sgst.sgst-list/>
</x-admin-layout>