<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubjectResultUpdate implements ToCollection, WithValidation
{
  public $term_id;
  public $level_id;
  public $subject_id;
  public $data;

  use Importable;

  public function __construct($term_id, $subject_id, $level_id)
  {
    $this->term_id = $term_id;
    $this->subject_id = $subject_id;
    $this->level_id = $level_id;
  }
  /**
   * @return int
   */
  public function startRow(): int
  {
    return 2;
  }

  public function rules(): array
  {
    return [];
  }

  public function collection(Collection $rows)
  {
    $this->data = $rows;
  }

  public function model(array $row)
  {
    $id = 0;
    // TODO: Implement model() method.

    $result = Result::whereKey('student_id', $row[0]);
    return $result->update([
      'ca_score'    =>  $row[5],
      'exam_score'    =>  $row[6],
      'term_id' => $this->term_id,
      'subject_id' => $this->subject_id,
      'level_id' => $this->level_id
    ]);
  }
}
