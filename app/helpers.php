<?php
use BladeUI\Icons\Exceptions\SvgNotFound;

if (! function_exists('safe_svg')) {
    function safe_svg(string $name, string $class = 'w-6 h-6')
    {
        $candidates = [
            $name,
            'lucide-' . ltrim($name, 'lucide-'),
            "lucide::" . ltrim($name, 'lucide-'),
        ];

        foreach ($candidates as $candidate) {
            try {
                return svg($candidate, $class)->toHtml(); // 👈 convert en HTML string
            } catch (SvgNotFound $e) {
                continue;
            } catch (\Throwable $e) {
                continue;
            }
        }

        try {
            return svg('lucide-help-circle', $class)->toHtml(); // 👈 idem
        } catch (\Throwable $e) {
            return '';
        }
    }
}
