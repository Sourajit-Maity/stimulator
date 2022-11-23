<x-admin-layout title="IGST Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="IGST List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('igst.index') }}" value="IGST List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('igst.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New IGST
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:igst.igst-list/>
</x-admin-layout>