<?php

namespace App\Repositories;

use App\Models\Event;

use App\Domain\Entity\EventEntity;
use App\Domain\ValueObject\boardHashCode;
use App\Domain\ValueObject\userId;
use App\Domain\ValueObject\eventHashCode;
use App\Domain\ValueObject\eventName;
use App\Domain\ValueObject\eventDescription;
use App\Domain\ValueObject\eventStartDatetime;
use App\Domain\ValueObject\eventEndDatetime;
use App\Domain\ValueObject\status;

class EventRepository
{
    public static function getEventList(boardHashCode $boardHashCode) {
        $events = Event::where('board_hash_code', $boardHashCode->getValue())->get();

        $rtn_collection = collect();
        foreach ($events as $key => $val) {
            $event = self::eventEntityReconstruct($val);
            $rtn_collection->push($event);
        }

        return $rtn_collection;
    }

    public static function find($hash_code) {
        $event = Event::where('hash_key', $hash_code)->first();

        if ($event === null) {
            return null;
        }

        return self::eventEntityReconstruct($event);
    }

    public static function add(userId $userId, EventEntity $eventEntity) {
        // 新規登録
        $event_new = new Event();
        $event_new->create([
            'hash_key' => $eventEntity->getEventHashCode()->getValue(),
            'event_name' => $eventEntity->getEventName()->getValue(),
            'description' => $eventEntity->getEventDescription()->getValue(),
            'status' => $eventEntity->getStatus()->getValue(),
            'event_start_date' => $eventEntity->getEventStartDatetime()->getValue(),
            'event_end_date' => $eventEntity->getEventEndDatetime()->getValue(),
            'created_by' => $userId->getValue()
        ]);            
    }

    public static function save(userId $userId, EventEntity $eventEntity) {
        $event = Event::where('hash_key', $eventEntity->getEventHashCode()->getValue())->first();

        // 更新
        $event->event_name = $eventEntity->geteventName()->getValue();
        $event->description = $eventEntity->geteventDescription()->getValue();
        $event->event_start_date = $eventEntity->getEventStartDatetime()->getValue();
        $event->event_end_date = $eventEntity->getEventEndDatetime()->getValue();
        $event->updated_by = $userId->getValue();   
        $event->save();    
    }

    public static function delete(EventEntity $eventEntity) {
        $event = Event::where('hash_key', $eventEntity->getEventHashCode()->getValue())->first();
        $event->delete();
    }

    private static function eventEntityReconstruct($event) {
        return EventEntity::Reconstruct(
            eventHashCode::Reconstruct($event->hash_key),
            eventName::Reconstruct($event->event_name),
            eventDescription::Reconstruct($event->description),
            eventStartDatetime::Reconstruct($event->event_start_datetime),
            eventEndDatetime::Reconstruct($event->event_end_datetime),
            status::Reconstruct($event->status)
        );
    }
}