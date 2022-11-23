<x-admin-layout title="CGST Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="CGST List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('cgst.index') }}" value="CGST List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('cgst.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New CGST
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:cgst.cgst-list/>
</x-admin-layout>