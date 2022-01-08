<?php

namespace App\RecordStatePattern;

class Record {
    private $patient_id;
    private $doctor_id;
    private $phi_id;
    private $type;
    private $feedback;
    private $temperature;
    private $fever;
    private $cough;
    private $sore_throat;
    private $short_breath;
    private $runny_nose;
    private $chills;
    private $muscle_ache;
    private $headache;
    private $fatigue;
    private $abdominal_pain;
    private $vomiting;
    private $diarrhea;
    private $other;
    private $checked_count;
    private $level;
    private $state;

    public function __construct() {
        $this->state = NotFilled::getInstance();
    }

    public function initialize($record_data) {
        $this->patient_id     = $record_data['patient_id'];
        $this->doctor_id      = $record_data['doctor_id'];
        $this->phi_id         = $record_data['phi_id'];
        $this->type           = $record_data['type'];
        $this->feedback       = $record_data['feedback'];
        $this->temperature    = $record_data['temperature'];
        $this->fever          = $record_data['fever'];
        $this->cough          = $record_data['cough'];
        $this->sore_throat    = $record_data['sore_throat'];
        $this->short_breath   = $record_data['short_breath'];
        $this->runny_nose     = $record_data['runny_nose'];
        $this->chills         = $record_data['chills'];
        $this->muscle_ache    = $record_data['muscle_ache'];
        $this->headache       = $record_data['headache'];
        $this->fatigue        = $record_data['fatigue'];
        $this->abdominal_pain = $record_data['abdominal_pain'];
        $this->vomiting       = $record_data['vomiting'];
        $this->diarrhea       = $record_data['diarrhea'];
        $this->other          = $record_data['other'];
        $this->checked_count  = $record_data['checked_count'];
        $this->level          = $record_data['level'];
        if ($record_data['checked'] == 1) {
            $this->check();
        } else {
            $this->fill();
        }
    }

    public function get_patient_id() {
        return $this->patient_id;
    }
    
    public function get_doctor_id() {
        return $this->doctor_id;
    }
    
    public function get_phi_id() {
        return $this->phi_id;
    }
    
    public function get_type() {
        return $this->type;
    }
    
    public function get_feedback() {
        return (string) $this->feedback;
    }
    
    public function get_temperature() {
        return $this->temperature;
    }

    public function get_fever() {
        if ($this->fever == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_cough() {
        if ($this->cough == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_sore_throat() {
        if ($this->sore_throat == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_short_breath() {
        if ($this->short_breath == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_runny_nose() {
        if ($this->runny_nose == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_chills() {
        if ($this->chills == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_muscle_ache() {
        if ($this->muscle_ache == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_headache() {
        if ($this->headache == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_fatigue() {
        if ($this->fatigue == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_abdominal_pain() {
        if ($this->abdominal_pain == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_vomiting() {
        if ($this->vomiting == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function get_diarrhea() {
        if ($this->diarrhea == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function get_other() {
        return $this->other;
    }
    
    public function get_checked_count() {
        return $this->checked_count;
    }
    
    public function get_level() {
        return $this->level;
    }

    public function transitionTo($state) {
        $this->state = $state;
    }

    public function fill() {
        $state_str = $this->stateToString();
        if ($state_str == 'Not-Filled') {
            $this->state->nextState($this);
        } else {
            echo "Invalid operation: Changing state from ".$state_str." to Unchecked is not allowed";
        }
    }

    public function check() {
        $state_str = $this->stateToString();
        if ($state_str == 'Not-Filled') {
            $this->fill();
            $this->check();
        } else {
            $this->state->nextState($this);
        }
    }

    public function stateToString() {
        return $this->state->toString();
    }

}