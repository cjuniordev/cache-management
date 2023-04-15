<?php

namespace Carlos;

class Cache
{
    private static array $cache = [];

    public static function get(string $key)
    {
        return self::$cache[$key] ?? null;
    }

    public static function set(string $key, mixed $value): mixed
    {
        self::$cache[$key] = $value;

        return $value;
    }

    public static function memoizate(callable $function): \Closure
    {
        return function (mixed ...$args) use ($function) {
            $key = implode(', ', $args);
            $cached = self::get($key);

            if ($cached) {
                return $cached;
            }

            $value = $function(...$args);
            self::set($key, $value);

            return $value;
        };
    }
}