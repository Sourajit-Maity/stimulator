<?php

namespace App\Http\Livewire\Cgst;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Cgst;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
class CgstList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchPercentage, $searchNumber,  $searchStatus = -1, $perPage = 5;
    protected $listeners = ['deleteConfirm', 'changeStatus'];

    public function mount()
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchPercentage = "";
        $this->searchNumber = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $dataQuery = Cgst::query();
        if ($this->searchPercentage)
            $dataQuery->orWhere('cgst_percentage', 'like', '%' . $this->searchPercentage . '%');

        if ($this->searchNumber)
            $dataQuery->orWhere('cgst_actual', 'like', '%' . $this->searchNumber . '%');
        if ($this->searchStatus >= 0)
            $userQuery->orWhere('active', $this->searchStatus);
        return view('livewire.cgst.cgst-list', [
            'datas' => $dataQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Cgst::destroy($id);
        $this->showModal('success', 'Success', 'Cgst  has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Overall Sale!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Cgst $data)
    {
        $data->fill(['active' => ($data->active == 1) ? 0 : 1])->save();

        $this->showModal('success', 'Success', 'Cgst status has been changed successfully');
    }
}
   
